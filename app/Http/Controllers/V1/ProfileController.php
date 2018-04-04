<?php

namespace App\Http\Controllers\V1;

use App\Exceptions\ConflictException;
use App\Models\Profile;
use App\Models\ProfileInterest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class UserController - Handles users operations.
 *
 * @package App\Http\Controllers\V1
 */
class ProfileController extends Controller
{
    use RESTActions;

    /**
     * Retrieve the user"s profile.
     *
     * @param int $request - The request object.
     *
     * @return Response object.
     */
    public function getProfile(Request $request)
    {
        $currentUser = $request->user();

        $user_profile = [
            "email" => $currentUser->email,
            "first_name" => $currentUser->firstname,
            "last_name" => $currentUser->lastname,
            "bio" => "",
            "interests" => [],
        ];

        if ($profile = Profile::where("user_id", $currentUser->uid)->first()) {
            $user_profile["bio"] = $profile->bio;
            $user_profile["interests"] = $profile->getInterests();
        }

        return $this->respond(Response::HTTP_OK, $user_profile);
    }

    /**
     * Create user profile
     *
     * @param int $request - The request object.
     *
     * @return Response object.
     */
    public function createProfile(Request $request)
    {
        $this->validate($request, ["bio" => "required", "interests" => "required"]);
        $currentUser = $request->user();
        $bio = $request->input("bio");
        $interests = $request->input("interests");
        $commaSeparatedInterests = explode(",", $interests);

        if (User::where("user_id", $currentUser->uid)->first()) {
            throw new ConflictException("User profile already exists");
        }

        User::create(
            [
                "user_id" => $currentUser->uid,
                "email" => $currentUser->email,
            ]
        );

        $createdProfile = Profile::create(
            [
                "bio" => $bio,
                "user_id" => $currentUser->uid,
            ]
        );

        foreach ($commaSeparatedInterests as $interest) {
            ProfileInterest::create(
                [
                    "profile_id" => $createdProfile->id,
                    "interest_id" => $interest,
                ]
            );
        }

        return $this->respond(Response::HTTP_CREATED, ["message" => "User profile created"]);
    }
}
