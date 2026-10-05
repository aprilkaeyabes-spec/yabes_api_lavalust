<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
    public function handle($next)
    {
        $session = load_class('session', 'libraries');
        $user_id = (int) $session->userdata('user_id');
        $role = $session->userdata('user_role');

        if ($user_id <= 0) {
            header('Location: ' . site_url('/login'));
            exit;
        }

        if ($role !== 'user') {
            show_error('403 Forbidden', 'Student access is required.', 'error_general', 403);
            exit;
        }

        return $next();
    }
}