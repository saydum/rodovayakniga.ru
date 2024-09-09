<?php

namespace App\Services;

use App\Models\Human;
use App\Models\ShareTreeLink;
use Illuminate\Support\Str;

class ShareTreeLinkService
{
    /**
     * Check if the link exists, if not then calls the method save()
     *
     * @param Human $human
     * @return ShareTreeLink|null
     */
    public function make(Human $human): ShareTreeLink|null
    {
        if ($human->shareTreeLink === null) $this->save($human);
        return $human->shareTreeLink;
    }

    /**
     * Save link for family tree
     *
     * @param Human $human
     * @return void
     */
    private function save(Human $human): void
    {
        $human->shareTreeLink()->create([
            'link' => $this->generate()
        ]);
    }

    /**
     * Generate url for link
     *
     * @return string
     */
    private function generate(): string
    {
        return Str::random(50);
    }
}
