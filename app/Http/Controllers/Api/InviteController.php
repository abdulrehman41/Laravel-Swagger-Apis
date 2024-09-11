<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Invite;
use Carbon\Carbon;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Invites",
 *     description="Invite endpoints"
 * )
 */
class InviteController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/invites",
     *     summary="Create a new invite",
     *     description="Generate a new invite token and set its expiration time.",
     *     tags={"Invites"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Invite created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string", example="random-generated-token")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Invalid input"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function createInvite(Request $request)
    {
        $token = Str::random(32);
        $expiresAt = Carbon::now()->addHours(24);

        Invite::create([
            'email' => $request->email,
            'token' => $token,
            'expires_at' => $expiresAt,
        ]);

        return response()->json(['token' => $token]);
    }

    /**
     * @OA\Put(
     *     path="/api/invites/{token}",
     *     summary="Resend an invite",
     *     description="Resend the invite by updating its expiration time.",
     *     tags={"Invites"},
     *     @OA\Parameter(
     *         name="token",
     *         in="path",
     *         description="The invite token",
     *         required=true,
     *         @OA\Schema(type="string", example="random-generated-token")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Invite resent successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string", example="random-generated-token")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Invite not found"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function resendInvite($token)
    {
        $invite = Invite::where('token', $token)->firstOrFail();
        $invite->expires_at = Carbon::now()->addHours(24);
        $invite->save();

        return response()->json(['token' => $token]);
    }
}
