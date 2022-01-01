<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{

    public static function sachMuon($saches) {
        $html = '';
        $stt = 1;
        foreach ($saches as $key => $value) {
            $checked = $value->ngaytra != null ? 'checked' : '';
            $ngayTra = $value->ngaytra != null ? $value->ngaytra : 'Trống';

            $html.= '<div class="col-12 d-flex align-items-center position-relative b-item">
                                                    <div class="img-custom">
                                                        <img src="'.$value->anhBia.'" id="avt-user" alt="bia">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <p class="font-bold mb-0">'.$value->tenSach.'</p>
                                                        <p class="mb-0" ><small>Ngày trả: '.$ngayTra.'</small></p>
                                                    </div>
                                                    <div class="form-check sm-check">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="'.$value->idSach.'" class="form-check-input form-check-info form-check-glow" '.  $checked .' name="sach'.$stt++.'" id="sach'.$value->idSach.'">
                                                            <label for="sach'.$value->idSach.'">Đã trả sách</label>
                                                        </div>
                                                    </div>
                                                </div>';
        }
        return $html;
    }

    public static function userOptions($users, $code): string
    {
        $html = '<div class="option '.$code.'">
                           <input type="radio" value="" class="radio" id="user_00" name="userID" checked/>
                           <label for="user_00"></label>
                      </div>';
        foreach ($users as $key => $user) {
            $html .= '<div class="option '.$code.'">
                           <input type="radio" value="'.$user->idNG.'" class="radio" id="user'.$user->idNG.'" name="userID" />
                           <label for="user'.$user->idNG.'"> <small>ID '.$user->idNG.'</small> - '.$user->name.'</label>
                      </div>';
        }
        return $html;
    }
    public static function sachOptions($saches, $code): string
    {
        $html = '<div class="option '.$code.'">
                           <input type="radio" value="" class="radio" id="bookID_00" name="bookID_'.$code.'" checked/>
                           <label for="bookID_00"></label>
                      </div>';
        foreach ($saches as $key => $sach) {
            $html .= '<div class="option '.$code.'">
                           <input type="radio" value="'.$sach->id.'" class="radio" id="bookID_'.$sach->id.$code.'" name="bookID_'.$code.'" />
                           <label for="bookID_'.$sach->id.$code.'"> <small>ID '.$sach->id.'</small> - '.$sach->tenSach.'</label>
                      </div>';
        }
        return $html;
    }

    private static function renderSachInfo($sachs, $id) {
        $html = '';
        foreach ($sachs as $key => $value) {
            if ($value->idPM == $id) {
                $html .= '
                <div class="avatar avatar-md bookname" data-bookname="'.$value->tenSach.'">
                                            <img src="'.$value->anhBia.'">
                                        </div>
            ';
            }
        }
        return $html;
    }

    private static function phieuDaTra($list, $sachs) {
        $html = '';
        $stt = 1;
        foreach ($list as $key => $value) {
            if ($value->datra == $value->tongsach) {
                $html = self::getHtml($value, $stt++, $sachs, $html);
            }
        }
        return $html;
    }


    private static function phieuDangMuon($list, $sachs) {
        $html = '';
        $stt = 1;
        foreach ($list as $key => $value) {
            if ($value->datra < $value->tongsach) {
                $html = self::getHtml($value, $stt++, $sachs, $html);
            }
        }
        return $html;
    }

    public static function dsPhieuMuon($list, $type, $sachs) {
        if($type == 0)
            return self::phieuDangMuon($list, $sachs);

        return self::phieuDaTra($list, $sachs);
    }



    public static function users($list): string
    {
        $html = "";
        $stt = 1;
        foreach ($list as $key => $user) {
            $avatar = $user->GioiTinh == 0 ? 'avt-nu.png' : 'avt-nam.png';
            $quyen = $user->quyen == 0 ? 'Bạn đọc' : 'admin';
            $html.= '
                <tr>
                     <td class="col-4">
                         <div class="d-flex align-items-center position-relative stt" data-stt="'.$stt++.'">
                              <div class="avatar avatar-md avatar-lg">
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
                         <a class="edit-btn custom-btn" href="edit/'. $user->id .'"><i class="bi bi-pencil-fill"></i></a>
                         <button class="remove-btn custom-btn" onclick="removeRow('. $user->id . ',\'/admin/users/destroy\')" >
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
        $to = Carbon::createFromFormat('Y-m-d H:i:s',  $date1);
        $from = Carbon::createFromFormat('Y-m-d H:i:s',  $date2);
        $interval = $to->diff($from);

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
        $i=1;
        foreach ($danhMucs as $key=>$danhMuc){
                $html .= '
                    <tr>
                        <td>'. $danhMucs->firstItem()+$key .'</td>
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

    public static function sach($saches){
        $html='';
        $i=1;
        foreach ($saches as $key=>$sach){
            $html .= '
                    <tr>
                        <td>'. $saches->firstItem()+$key .'</td>
                        <td>'. $sach->tenSach .'</td>
                        <td>'. $sach->moTa .'</td>
                        <td>'. $sach->soLuong .'</td>
                        <td>'. $sach->tacGia .'</td>
                        <td>'. $sach->NXB .'</td>
                        <td>'.  number_format($sach->gia, 0, ',', '.') . "đ" .'</td>
                        <td>'. $sach->danhMuc->tenDanhMuc .'</td>
                        <td><a href="'. $sach->anhBia .'" target="_blank"><img src="'. $sach->anhBia .'" width="100px"></a></td>
                        <td>
                            <a class="edit-btn custom-btn" href="/admin/sach/edit/'. $sach->id .'">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a class="remove-btn custom-btn" href="#" onclick="removeRow('. $sach->id . ',\'/admin/sach/destroy\')">
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

    /**
     * @param $value
     * @param int $stt
     * @param $sachs
     * @param string $html
     * @return string
     */
    private static function getHtml($value, int $stt, $sachs, string $html): string
    {
        $avatar = $value->GioiTinh == 0 ? 'avt-nu.png' : 'avt-nam.png';
        $html .= '<tr class="position-relative">
                                <td class="col-3">
                                    <div class="d-flex align-items-center position-relative stt ma-pm" data-pm="Mã phiếu: ' . $value->id . '" data-stt="' . $stt . '">
                                        <div class="avatar avatar-lg">
                                            <img src="/template/admin/assets/images/faces/' . $avatar . '">
                                        </div>
                                        <a href="/admin" class="font-bold ms-3 mb-0">' . $value->name . '</a>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div>
                                        ' . self::renderSachInfo($sachs, $value->id) . '
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="progress progress-sm progress-info mt-4">
                                        <div class="progress-bar" role="progressbar" style="width: calc(100% * ' . $value->datra . '/' . $value->tongsach . ')" aria-valuenow="' . $value->datra . '" aria-valuemin="0" aria-valuemax="' . $value->tongsach . '"></div>
                                    </div>
                                    <span class="small">' . $value->datra . '/' . $value->tongsach . '</span>
                                </td>
                                <td class="text-center small">' .   Carbon::parse($value->ngaymuon)->format('d/m/Y') . ' - ' . Carbon::parse($value->ngayhentra)->format('d/m/Y') . '</td>

                                <td class="text-center">
                                    <a class="edit-btn custom-btn" href="edit/' . $value->id . '"><i class="bi bi-pencil-fill"></i></a>
                                    <button class="remove-btn custom-btn" onclick="removeRow(' . $value->id . ',\'/admin/phieumuon/destroy\')" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                        </svg>
                                    </button>

                                </td>
                            </tr>';
        return $html;
    }
}
