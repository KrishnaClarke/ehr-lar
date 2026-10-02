<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * HTTP Basic protection for the staff pages.
 * Credentials come from ADMIN_USER / ADMIN_PASSWORD in .env (see config/ehr.php).
 */
class StaffOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = (string) config('ehr.admin_user');
        $password = (string) config('ehr.admin_password');

        if ($user === '' || $password === '') {
            abort(403, 'Staff credentials are not configured.');
        }

        if (! hash_equals($user, (string) $request->getUser())
            || ! hash_equals($password, (string) $request->getPassword())) {
            return response('Unauthorized', 401, [
                'WWW-Authenticate' => 'Basic realm="EHR Staff"',
            ]);
        }

        return $next($request);
    }
}
