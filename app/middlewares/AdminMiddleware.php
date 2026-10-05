<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminMiddleware
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

        if ($role !== 'admin') {
            show_error('403 Forbidden', 'Administrator access is required.', 'error_general', 403);
            exit;
        }

        return $next();
    }
}