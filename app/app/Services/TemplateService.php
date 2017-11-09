<?php

namespace App\Services;

use App\Template;

class TemplateService extends AbstractService
{
    /**
     * @param $data
     */
    public function save($data)
    {
        $template = Template::create($data);
        $template->user_id = $this->getCurrentUser()->id;
        $template->exercises()->attach(array_reverse($data['exercises']));
        $template->save();
    }

    /**
     * @param Template $template
     */
    public function delete(Template $template)
    {
        $template->exercises()->detach();
        $template->delete();
    }
}