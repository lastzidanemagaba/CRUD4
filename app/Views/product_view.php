<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h3>CRUD</h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Tambah</button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1;foreach($product as $row):?>
                <tr>
                    <td><?= $i++;?></td>
                    <td><?= $row->customer;?></td>
                    <td><?= $row->nohp;?></td>
                    <td><?= $row->alamat;?></td>
                    <td><?= $row->deskripsi;?></td>
                    <td><?= $row->category_name;?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->product_id;?>" data-customer="<?= $row->customer;?>" data-nohp="<?= $row->nohp;?>" data-alamat="<?= $row->alamat;?>" data-deskripsi="<?= $row->deskripsi;?>"data-category_id="<?= $row->product_category_id;?>">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->product_id;?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

    </div>
    
    <!-- Modal Add Product-->
    <div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="<?= base_url('dropzone/upload') ?>" method="POST" enctype="multipart/form-data" class="dropzone" id='image-upload'>
    </form>
    </div>
  </div>
</div>
    <form action="/product/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                    <label>Customer</label>
                    <select name="customer" class="form-control">
                        <option value="">-Pilih-</option>
                        <option value="1">Asep</option>
                        <option value="2">Asepso</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" class="form-control" name="nohp" placeholder="No HP">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" >
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="product_category" class="form-control">
                        <option value="">-Pilih-</option>
                        <?php foreach($category as $row):?>
                        <option value="<?= $row->category_id;?>"><?= $row->category_name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label>AJAX Yang Relasi</label>
                    <select name="ajaxya" class="form-control">
                        <option value="">-Pilih-</option>
                        
                    </select>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->

    <!-- Modal Edit Product-->
    <form action="/product/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                    <label>Customer</label>
                    <input type="text" class="form-control customer" name="customer" placeholder="Nama Customer">
                </div>
                
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" class="form-control nohp" name="nohp" placeholder="No HP">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control alamat" name="alamat" placeholder="Alamat" >
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control deskripsi" name="deskripsi" placeholder="Deskripsi">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="product_category" class="form-control product_category">
                        <option value="">-Pilih-</option>
                        <?php foreach($category as $row):?>
                        <option value="<?= $row->category_id;?>"><?= $row->category_name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="product_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->

    <!-- Modal Delete Product-->
    <form action="/product/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Delete ?</h4>
            
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="productID">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
   Dropzone.options.imageUpload = {
            maxFilesize: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
        };
    $(document).ready(function(){

        // get Edit Product
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const customer = $(this).data('customer');
            const nohp = $(this).data('nohp');
            const alamat = $(this).data('alamat');
            const deskripsi = $(this).data('deskripsi');
            const category = $(this).data('category_id');
            // Set data to Form Edit
            $('.customer').val(customer);
            $('.nohp').val(nohp);
            $('.alamat').val(alamat);
            $('.deskripsi').val(deskripsi);
            $('.product_category').val(category).trigger('change');
            // Call Modal Edit
            $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.productID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
        
    });
</script>
</body>
</html>