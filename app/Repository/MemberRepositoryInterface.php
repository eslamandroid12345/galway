<?php

namespace App\Repository;

interface MemberRepositoryInterface extends RepositoryInterface
{
public function getMembersForAbout($about_id);
}
