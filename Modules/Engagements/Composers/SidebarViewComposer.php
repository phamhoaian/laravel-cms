<?php

namespace TypiCMS\Modules\Engagements\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('see-all-engagements')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Engagements'), function (SidebarItem $item) {
                $item->id = 'engagements';
                $item->icon = config('typicms.engagements.sidebar.icon', 'icon fa fa-fw fa-cube');
                $item->weight = config('typicms.engagements.sidebar.weight');
                $item->route('admin::index-engagements');
                $item->append('admin::create-engagement');
            });
        });
    }
}
