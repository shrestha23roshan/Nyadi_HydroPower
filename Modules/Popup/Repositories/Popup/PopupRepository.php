<?php
namespace Modules\Popup\Repositories\Popup;

interface PopupRepository 
{
    public function all();

    public function getActive();
}