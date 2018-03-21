<?php

namespace TypiCMS\Modules\Careers\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-careers')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Careers'), function (SidebarItem $item) {
                $item->id = 'careers';
                $item->icon = config('typicms.careers.sidebar.icon');
                $item->weight = config('typicms.careers.sidebar.weight');
                $item->route('admin::index-careers');
                $item->append('admin::create-career');
            });
        });
    }
}
