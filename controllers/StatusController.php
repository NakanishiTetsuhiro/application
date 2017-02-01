<?php

class StatusController extends Controller
{
    // セッションからユーザ情報の取得と投稿一覧の取得
    public function indexAction()
    {
        $user = $this->session->get('user');
        $statuses = $this->db_manager->get('Status')
            ->fetchAllPersonalArchivesByUserId($user['id']);

        return $this->render(array(
            'statuses' => $statuses,
            'body'     => '',
            '_token' => $this->generateCsrfToken('status/post'),
        ));
    }
}
