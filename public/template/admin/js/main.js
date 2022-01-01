$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm('Bạn có muốn xoá không?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function (result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xoá lỗi. Vui lòng thử lại');
                }
            }
        })
    }
}

/*Upload file*/
$('#upload').change(function () {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results){
            // console.log(results);
            if (results.error===false){
                $('#image_show').html('<a href="' + results.url + '" target="_blank">'+
                    '<img src="' + results.url + '" width="100px"></a>');
                $('#anhBia').val(results.url);
            }
            else{
                alert('Upload file lỗi');
            }
        }
    });
});

// search
function renderUsers(list) {
    let html = "";

    if(list == null) return "";

    list.forEach(user => {
        console.log(user);
        html += `
            <tr>
                <th>HỌ TÊN</th>
                <th class="text-center">SỐ ĐIỆN THOẠI</th>
                <th class="text-center">QUYỀN</th>
                <th class="text-center">THAO TÁC</th>
            </tr>
            <tr>
                     <td class="col-3">
                         <div class="d-flex align-items-center">
                              <div class="avatar avatar-md">
                                    <img src="/template/admin/assets/images/faces/${user.GioiTinh == 1 ? "avt-nam.png" : "avt-nu.png"}">
                              </div>
                              <p class="font-bold ms-3 mb-0">${user.name}</p>
                         </div>
                     </td>
                     <td class="text-center">${user.SDT}</td>
                     <td class="text-center">
                         <span class="quyen">${user.quyen == 1 ? "Admin" : "Bạn đọc"}</span>
                     </td>
                     <td class="text-center">
                         <a class="edit-btn custom-btn" href="edit/${user.id}"><i class="bi bi-pencil-fill"></i></a>
                         <button class="remove-btn custom-btn" onclick="removeRow(${user.id},'/admin/users/destroy')" >
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                 <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                 <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                             </svg>
                         </button>

                     </td>
                </tr>
        `;
    });
    return html;
}

function renderSaches(list) {
    let html = "";

    if(list == null) return "";

    let i=1;

    list.forEach(sach => {
        console.log(sach);
        html += `
            <tr>
                <th style="width: 50px">STT</th>
                <th>TÊN SÁCH</th>
                <th>MÔ TẢ</th>
                <th>SỐ LƯỢNG</th>
                <th>TÁC GIẢ</th>
                <th>NHÀ XUẤT BẢN</th>
                <th>GIÁ TIỀN</th>
                <th>THỂ LOẠI</th>
                <th>ẢNH MINH HỌA</th>
                <th>THAO TÁC</th>
            </tr>
            <tr>
                <td class="text-center">${i++}</td>
                <td class="text-center">${sach.tenSach}</td>
                <td class="text-center">${sach.moTa}</td>
                <td class="text-center">${sach.soLuong}</td>
                <td class="text-center">${sach.tacGia}</td>
                <td class="text-center">${sach.NXB}</td>
                <td class="text-center">${sach.gia}</td>
                <td class="text-center">${sach.tenDanhMuc}</td>
                <td class="text-center"><a href="${sach.anhBia}" target="_blank"><img src="${sach.anhBia}" width="100px"></a></td>
                <td class="text-center">
                    <a class="edit-btn custom-btn" href="edit/${sach.id}"><i class="bi bi-pencil-fill"></i></a>
                         <button class="remove-btn custom-btn" onclick="removeRow(${sach.id},'/admin/sach/destroy')" >
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                 <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                 <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                             </svg>
                         </button>

                     </td>
                </tr>
        `;
    });
    return html;
}

function renderDanhMucs(list) {
    let html = "";

    if(list == null) return "";

    list.forEach(danhMuc => {
        console.log(danhMuc);
        html += `
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tên danh mục</th>
                <th>Update</th>
            </tr>
            <tr>
                     <td class="text-center">${danhMuc.id}</td>
                     <td class="text-center">${danhMuc.tenDanhMuc}</td>
                     <td class="text-center">
                         <a class="edit-btn custom-btn" href="edit/${danhMuc.id}"><i class="bi bi-pencil-fill"></i></a>
                         <button class="remove-btn custom-btn" onclick="removeRow(${danhMuc.id},'/admin/danhmuc/destroy')" >
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                 <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                 <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                             </svg>
                         </button>

                     </td>
                </tr>
        `;
    });
    return html;
}

function Search(idInput, url, idNullFeedback, idTable, renderFunc) {
    const input = document.getElementById(idInput);
    const nullFeedBack = document.getElementById(idNullFeedback);
    const table = document.getElementById(idTable);

    if(input == null) return;

    input.onkeyup = function () {
        let keyword = this.value.trim();

        setTimeout(() => {
            let text = this.value.trim();
            if (text == keyword) {
                $.ajax({
                    type: 'post',
                    datatype: 'JSON',
                    data: {keyword},
                    url: url,
                    success: function (result) {
                        // if(renderFunc!=null) {
                        //     table.innerHTML = renderFunc(result.list);
                        // }
                        // else{
                        //     table.innerHTML=result.list;
                        // }
                        table.innerHTML = renderFunc(result.list);
                        nullFeedBack.innerText = result.message;
                    }
                })
            }
        }, 200);
    }
}



Search('search-user', '/admin/users/search', 'users-null', 'user-table', renderUsers);
Search('search-sach', '/admin/sach/search', 'saches-null', 'sach-table', renderSaches);
Search('search-danhMuc', '/admin/danhmuc/search', 'danhMucs-null', 'danhMuc-table', renderDanhMucs);

const chartPm =  document.getElementById('PMChart');
console.log(chartPm.dataset.dangMuon);
console.log(chartPm.dataset.daTra);

const data = {
    labels: [
        'Phiếu đang mượn',
        'Phiếu đã trả',
    ],
    datasets: [{
        label: 'Biểu đồ phiếu mượn',
        data: [chartPm.dataset.dangmuon, chartPm.dataset.datra],
        backgroundColor: [
            '#553bfc',
            '#02c3f9'
        ],
        hoverOffset: 4
    }]
}

const config = {
    type: 'doughnut',
    data: data,
};

const PMChar = new Chart(
   chartPm,
    config
);
