

@extends('admin.home')

@section('content')
    <nav class="navbar-light mb-10">
        <div class="container d-block">
            <a href="{{ url()->previous() }}"><i class="bi bi-chevron-left"></i></a>
        </div>
    </nav>

    <div class="page-heading custom-padding-inline">
        <h3>Thêm phiếu mượn mới</h3>
    </div>

    <div class="container">

        <div class="row">
            <div class="card mt-5 col-12">
                <div class="card-body pt-lg-5">
                    <form class="form form-vertical" method="post" action="">
                        <div class="form-body">
                            <div class="row">
                               <div class="col-12 col-lg-6">
                                   <h4 class="card-title mb-md-3">Thông tin chung</h4>
                                   <div class="col-12 mb-2">
                                       <label>Người mượn</label>
                                       <div class="select-box">
                                           <div class="options-container b0">
                                               {!! \App\Helpers\Helper::userOptions($users, "b0") !!}
                                           </div>

                                           <div class="@error('userID') is-invalid @enderror form-select selected b0">
                                               Chọn người mượn
                                           </div>

                                           <div class="invalid-feedback">
                                               @error('userID') {{$message}} @enderror
                                           </div>

                                           <div class="search-box">
                                               <input class="b0" type="text" placeholder="Tìm kiếm người dùng" />
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-12 mb-2">
                                       <label for="ngayhentra">Ngày hẹn trả</label>
                                       <input type="date" class="@error('ngayhentra') is-invalid @enderror  form-control padding-10" id="ngayhentra" name="ngayhentra">
                                       <div class="invalid-feedback">
                                           @error('ngayhentra') {{$message}} @enderror
                                       </div>
                                   </div>
                               </div>
                                <div class="col-12 col-lg-6">
                                    <h4 class="card-title mb-md-3">Sách mượn</h4>
                                    <div class="col-12 mb-2">
                                        <label>Sách 1</label>
                                        <div class="select-box">
                                            <div class="options-container b1">
                                                {!! \App\Helpers\Helper::sachOptions($saches, "b1") !!}
                                            </div>

                                            <div class="@error('bookID_b1') is-invalid @enderror  form-select selected b1">
                                                Chọn sách
                                            </div>

                                            <div class="invalid-feedback">
                                                @error('bookID_b1') {{$message}} @enderror
                                            </div>

                                            <div class="search-box">
                                                <input class="b1" type="text" placeholder="Tìm kiếm sách" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label>Sách 2</label>
                                        <div class="select-box">
                                            <div class="options-container b2">
                                                {!! \App\Helpers\Helper::sachOptions($saches, "b2") !!}
                                            </div>

                                            <div class="@error('bookID_b2') is-invalid @enderror  form-select selected b2">
                                                Chọn sách
                                            </div>

                                            <div class="invalid-feedback">
                                                @error('bookID_b2') {{$message}} @enderror
                                            </div>

                                            <div class="search-box">
                                                <input class="b2" type="text" placeholder="Tìm kiếm  sách" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label>Sách 3</label>
                                        <div class="select-box">
                                            <div class="options-container b3">
                                                {!! \App\Helpers\Helper::sachOptions($saches, "b3") !!}
                                            </div>

                                            <div class="@error('bookID_b3') is-invalid @enderror  form-select selected b3">
                                                Chọn sách
                                            </div>
                                            <div class="invalid-feedback">
                                                @error('bookID_b3') {{$message}} @enderror
                                            </div>

                                            <div class="search-box">
                                                <input class="b3" type="text" placeholder="Tìm kiếm sách" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Thêm mới</button>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const selectedB = {
            b1: -1,
            b2: -1,
            b3: -1
        }

        function hiddenBook(id, name) {
            const optionsList = document.querySelectorAll(optionsListName);
            optionsList.forEach(o => {
                let bookName = o.querySelector("input").innerHTML;
                let bookID = o.querySelector("input").value;
               if(id == bookID && name == bookName) {
                   o.style.display = "none";
               } else {
                   o.style.display = "block";
               }
            });
        }

        function IsSelected(id) {
            if (id == selectedB.b1) return true;
            if (id == selectedB.b2) return true;
            if (id == selectedB.b3) return true;

            return false;
        }

        function liveSearch(selectedName, optionsContainerName, searchBoxName, optionsListName, stt = 0) {
            const selected = document.querySelector(selectedName);
            const optionsContainer = document.querySelector(optionsContainerName);
            const searchBox = document.querySelector(searchBoxName);

            const optionsList = document.querySelectorAll(optionsListName);

            selected.addEventListener("click", () => {
                optionsContainer.classList.toggle("active");

                searchBox.value = "";
                filterList("");

                if (optionsContainer.classList.contains("active")) {
                    searchBox.focus();
                }
            });

            optionsList.forEach(o => {
                o.addEventListener("click", (event) => {
                    console.log(event.target)
                    selected.innerHTML = o.querySelector("label").innerHTML;
                    optionsContainer.classList.remove("active");
                    if (stt == 1) selectedB.b1 = o.querySelector("input").value;
                    if (stt == 2) selectedB.b2 = o.querySelector("input").value;
                    if (stt == 3) selectedB.b3 = o.querySelector("input").value;
                });
            });

            searchBox.addEventListener("keyup", function(e) {
                filterList(e.target.value);
            });

            const filterList = searchTerm => {
                searchTerm = searchTerm.toLowerCase();
                optionsList.forEach(option => {
                    let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
                    if(stt != 0 ) {
                        if (label.indexOf(searchTerm) != -1 && !IsSelected(option.querySelector("input").value)) {
                            option.style.display = "block";
                        } else {
                            option.style.display = "none";
                        }
                    } else {
                        if (label.indexOf(searchTerm) != -1) {
                            option.style.display = "block";
                        } else {
                            option.style.display = "none";
                        }
                    }
                });
            };
        }

        liveSearch(".selected.b0", ".options-container.b0", ".search-box input.b0", ".option.b0");
        liveSearch(".selected.b1", ".options-container.b1", ".search-box input.b1", ".option.b1", 1);
        liveSearch(".selected.b2", ".options-container.b2", ".search-box input.b2", ".option.b2", 2);
        liveSearch(".selected.b3", ".options-container.b3", ".search-box input.b3", ".option.b3", 3);
    </script>
@endsection

