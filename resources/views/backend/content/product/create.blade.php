@extends('backend.master')

@section('maincontent')
@section('title')
    Ayebazar- Create Products
@endsection

<style>
    div#roleinfo_length {
        color: red;
    }

    div#roleinfo_filter {
        color: red;
    }

    div#roleinfo_info {
        color: red;
    }
</style>

<div class="container-fluid pt-4 px-4">
    <div class="row pt-4" style="background: #191C24 !important">

        <form name="form" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                    <div class="form-group mb-3">
                        <label for="ProductName">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="ProductName" id="ProductName" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="ProductRegularPrice">Regular Price <span
                                        class="text-danger">*</span></label>
                                <input type="number" id="ProductRegularPrice" name="ProductRegularPrice"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="ProductSalePrice">Discount <span class="text-danger">*</span></label>
                                <input type="number" id="Discount" name="Discount" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="ProductCategory" style="width: 100%;">Categories <span
                                        class="text-danger">*</span></label>
                                <select class="form-control" id="category_id" style="background: black;"
                                    name="category_id" onchange="setsubcategory()" required>
                                    <option>Select Category</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="ProductCategory" style="width: 100%">Sub Category <span
                                        class="text-danger">*</span></label>
                                <select class="form-control" id="sub_category_id" style="background: black;"
                                    name="subcategory_id" required>
                                    <option>Select Sub-Category</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="ProductRegularPrice">Product Short Description <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" name="ProductBreaf" rows="2"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="ProductDetailsss">Product Description <span class="text-danger">*</span></label>
                        <textarea class="form-control ckeditor" id="ProductDetails" name="ProductDetails" rows="5"></textarea>
                    </div>

                </div>

                <div class="col-lg-6">


                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="ProductDetails">Product Image <span class="text-danger">*</span></label>
                                <button type="button" class="btn btn-danger d-block mb-2" style="background: red">
                                    <input type="file" name="ProductImage" id="ProductImage"
                                        onchange="loadFile(event)">
                                </button>
                                <div class="single-image image-holder-wrapper clearfix">
                                    <div class="image-holder placeholder">
                                        <img id="prevImage" style="height:100px;width:100%" />
                                        <i class="mdi mdi-folder-image"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="form-group"
                                style="padding: 10px;padding-top: 3px;margin:0;padding-bottom:3px;width:96%;margin-left: 8px;border-radius: 8px;padding-left: 0;margin-left: -0;">
                                <label class="fileContainer">
                                    <span style="font-size: 20px;">Product Slider
                                        image</span>
                                </label>
                                <br>
                                <button type="button" class="btn btn-danger d-block mb-2" style="background: red">
                                    <input type="file" onchange="prevPost_Img()" name="PostImage[]" id="PostImage"
                                        multiple>
                                </button>
                            </div>
                            <div class="file">
                                <div id="prevFile" style="width: 100%;float:left;background: lightgray;">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="ProductRegularPrice">Colour
                                    <span class="text-danger">*</span></label>
                                <br>
                                @forelse ($colors as $color)
                                    <input type="checkbox" name="color[]" value="{{ $color->value }}">
                                    {{ $color->value }} &nbsp;
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="ProductSalePrice">Size <span class="text-danger">*</span></label>
                                <br>
                                @forelse ($sizes as $size)
                                    <input type="checkbox" name="size[]" value="{{ $size->value }}">
                                    {{ $size->value }} &nbsp;
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="ProductSalePrice">Weights <span class="text-danger">*</span></label>
                                <br>
                                @forelse ($weights as $weight)
                                    <input type="checkbox" name="weight[]" value="{{ $weight->value }}">
                                    {{ $weight->value }}
                                    &nbsp;
                                @empty
                                @endforelse
                            </div>
                        </div>



                    </div>

                </div>
                <div class="col-12 pb-4">
                    <div class="submitBtnSCourse">
                        <button type="submit" style="width:100%" name="btn"
                            class="btn btn-primary btn-block">Save</button>
                    </div>
                </div>
            </div>
        </form>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </div>
</div>

<script type="text/javascript">
    initSample();
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>


<script type="text/javascript">
    function setsubcategory() {
        var sub_id = $('#category_id').val();
        $.ajax({
            type: 'GET',
            url: 'get/subcategory/' + sub_id,

            success: function(data) {
                $('#sub_category_id').html('');

                for (var i = 0; i < data.length; i++) {
                    $('#sub_category_id').append(`
                            <option value="` + data[i].id + `" >` + data[i].sub_category_name + `</option>
                        `)
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function editsetsubcategory() {
        var sub_id = $('#editcategory_id').val();
        $.ajax({
            type: 'GET',
            url: 'get/subcategory/' + sub_id,

            success: function(data) {
                $('#editsub_category_id').html('');

                for (var i = 0; i < data.length; i++) {
                    $('#editsub_category_id').append(`
                            <option value="` + data[i].id + `" >` + data[i].sub_category_name + `</option>
                        `)
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }
</script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('prevImage');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    var galleryloadFile = function(event) {
        // document.getElementById("previmg").style.display = "none";
        var output = document.getElementById('galleryprevImage');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

    var editloadFile = function(event) {
        $('#previmg').html('');
        var output = document.getElementById('editprevImage');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    var editgalleryloadFile = function(event) {
        // document.getElementById("previmg").style.display = "none";
        var output = document.getElementById('editgalleryprevImage');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>


<script>
    var PostImages = [];

    function prevPost_Img() {
        var PostImage = document.getElementById('PostImage').files;

        for (i = 0; i < PostImage.length; i++) {
            if (check_duplicate(PostImage[i].name)) {
                PostImages.push({
                    "name": PostImage[i].name,
                    "url": URL.createObjectURL(PostImage[i]),
                    "file": PostImage[i],
                });
            } else {
                alert(PostImage[i].name + 'is already added to your list');
            }
        }

        document.getElementById("prevFile").innerHTML = PostImage_show();

    }

    function check_duplicate(name) {
        var PostImage = true;
        if (PostImages.length > 0) {
            for (e = 0; e < PostImages.length; e++) {
                if (PostImages[e].name == name) {
                    PostImage = false;
                    break;
                }
            }
        }
        return PostImage;
    }

    function PostImage_show() {
        var PostImage = "";
        PostImages.forEach((i) => {
            PostImage += `<div class="postImg" style="width:25%;float:left;position:relative;">
                                <img src="` + i.url + `" alt="" id="previewImage" style="border-radius: 10px;width:100%;padding:5px;">
                                <span onclick="removeSelectedPostImage(` + PostImages.indexOf(i) + `)" style="position: absolute;right: 0;cursor: pointer;font-size: 31px;color: red;margin-top: -8px;margin-right: 8px;">&times</span>
                            </div>`;
        })
        return PostImage;
    }

    function removeSelectedPostImage(e) {
        PostImages.splice(e, 1);
        document.getElementById("prevFile").innerHTML = PostImage_show();
    }

    var editPostImages = [];

    function editprevPost_Img() {
        $('#viewprevFile').html('');
        var editPostImage = document.getElementById('editPostImage').files;

        for (i = 0; i < editPostImage.length; i++) {
            if (check_duplicate(editPostImage[i].name)) {
                editPostImages.push({
                    "name": editPostImage[i].name,
                    "url": URL.createObjectURL(editPostImage[i]),
                    "file": editPostImage[i],
                });
            } else {
                alert(editPostImage[i].name + 'is already added to your list');
            }
        }

        document.getElementById("editprevFile").innerHTML = editPostImage_show();

    }

    function check_duplicate(name) {
        var editPostImage = true;
        if (editPostImages.length > 0) {
            for (e = 0; e < editPostImages.length; e++) {
                if (editPostImages[e].name == name) {
                    editPostImage = false;
                    break;
                }
            }
        }
        return editPostImage;
    }

    function editPostImage_show() {
        var editPostImage = "";
        editPostImages.forEach((i) => {
            editPostImage += `<div class="postImg" style="width:25%;float:left;position:relative;">
                                <img src="` + i.url + `" alt="" id="previewImage" style="border-radius: 10px;width:100%;padding:5px;">
                                <span onclick="removeSelectededitPostImage(` + editPostImages.indexOf(i) + `)" style="position: absolute;right: 0;cursor: pointer;font-size: 31px;color: red;margin-top: -8px;margin-right: 8px;">&times</span>
                            </div>`;
        })
        return editPostImage;
    }

    function removeSelectededitPostImage(e) {
        editPostImages.splice(e, 1);
        document.getElementById("editprevFile").innerHTML = editPostImage_show();
    }
</script>
<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

@endsection
