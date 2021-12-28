<?php

namespace App\Helpers;

class Helper
{
    public static function users($list) {
        $html = "";
        foreach ($list as $key => $user) {
            $quyen = $user->quyen == 0 ? 'Bạn đọc' : 'admin';
            $html.= '
                <tr>
                     <td class="text-bold-500">'. $user->name .'</td>
                     <td>'. $user->SDT .'</td>
                     <td>
                         <span class="quyen">'. $quyen .'</span>
                     </td>
                     <td>
                         <a class="edit-btn custom-btn" href="#"><i class="bi bi-pencil-fill"></i></a>
                         <button class="remove-btn custom-btn">
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                 <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                 <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                             </svg>
                         </button>
                     </td>
                </tr>
            ';
        }
        return $html;
    }
}
