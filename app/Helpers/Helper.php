<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{
    public static function users($list): string
    {
        $html = "";
        foreach ($list as $key => $user) {
            $avatar = $user->GioiTinh == 0 ? 'avt-nu.png' : 'avt-nam.png';
            $quyen = $user->quyen == 0 ? 'Bạn đọc' : 'admin';
            $html.= '
                <tr>
                     <td class="col-3">
                         <div class="d-flex align-items-center">
                              <div class="avatar avatar-md">
                                    <img src="/template/admin/assets/images/faces/'.$avatar.'">
                              </div>
                              <p class="font-bold ms-3 mb-0">'. $user->name .'</p>
                         </div>
                     </td>
                     <td class="text-center">'. $user->SDT .'</td>
                     <td class="text-center">
                         <span class="quyen">'. $quyen .'</span>
                     </td>
                     <td class="text-center">
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

    private static function DateUpdate($date1): string
    {
        if ($date1 == null)
            return "Không xác định";

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date2 = Carbon::now();

        $interval = $date1->diff($date2);

        if($interval->d > 1)
            return date("d/m/Y", $date1->getTimestamp());
        if($interval->d == 1)
            return "hôm qua";
        if($interval->h != 0)
            return $interval->h." giờ trước";
        if($interval->i != 0)
            return $interval->i." phút trước";
        return $interval->s." giây trước";
    }

    public static function newUsers($list): string
    {
        $html = "";
        foreach ($list as $key => $user) {
            $avatar = $user->GioiTinh == 0 ? 'avt-nu.png' : 'avt-nam.png';
            $html.= '
                <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="/template/admin/assets/images/faces/'.$avatar.'">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">'.$user->name.'</h5>
                            <h6 class="text-muted mb-0">'. self::DateUpdate($user->created_at) .'</h6>
                        </div>
                    </div>
            ';
        }
        return $html;
    }

    public static function danhMuc($danhMucs){
        $html='';
        foreach ($danhMucs as $key=>$danhMuc){
                $html .= '
                    <tr>
                        <td>'. $danhMuc->id .'</td>
                        <td>'. $danhMuc->tenDanhMuc .'</td>
                        <td>
                            <a class="edit-btn custom-btn" href="/admin/danhmuc/edit/'. $danhMuc->id .'">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a class="remove-btn custom-btn" href="#" onclick="removeRow('. $danhMuc->id . ',\'/admin/danhmuc/destroy\')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                 <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                 <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                             </svg>
                            </a>
                        </td>
                    </tr>

                ';


        }
        return $html;
    }

}
