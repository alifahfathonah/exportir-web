 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1>Profil</h1>
             </div>
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Setting</a></li>
                     <li class="breadcrumb-item active">Profil</li>
                 </ol>
             </div>
         </div>
     </div>
 </section>
 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-3">
                 <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                         <div class="text-center">
                             <img class="profile-user-img img-fluid img-circle" src="<?= $this->server_side->getFoto() ?>" alt="User profile picture">
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-9">
                 <div class="card">
                     <form id="form-profil" method="POST">
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="nama">Nama</label>
                                         <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $profil->nama ?>">
                                         <input type="hidden" class="form-control" id="id" name="id" value="<?= $profil->id ?>">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="email">Email</label>
                                         <input type="email" class="form-control" id="email" disabled name="email" placeholder="Masukkan email" value="<?= $profil->email ?>">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="password">Password</label>
                                         <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan jika ubah password" autocomplete="off">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="re_password">Masukkan ulang password</label>
                                         <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Masukkan jika ubah password" autocomplete="off">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="tgl_lahir">Tanggal Lahir</label>
                                         <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan tanggal lahir" value="<?= $profil->tgl_lahir ?>">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="no_hp">No. Handphone</label>
                                         <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor handphone" value="<?= $profil->no_hp ?>">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="alamat">Alamat</label>
                                         <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $profil->alamat ?>">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="propinsi">Propinsi</label>
                                         <select name="propinsi" class="form-control" id="propinsi">
                                             <option value="">- Pilih Propinsi -</option>
                                             <?php foreach ($propinsi as $p) : ?>
                                                 <option value="<?= $p->province_id ?>" <?= ($p->province_id == $profil->id_propinsi) ? 'selected' : '';?>><?= $p->province; ?></option>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="kota">Kota</label>
                                         <select name="kota" class="form-control" id="kota">
                                            <option value="">- Pilih Kota -</option>
                                             <?php foreach ($kota as $p) : ?>
                                                 <option value="<?= $p->city_id ?>" <?= ($p->city_id == $profil->id_kota) ? 'selected' : '';?>><?= $p->city_name; ?></option>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="photo">Photo Profil</label>
                                         <input type="file" name="photo" class="form-control" id="photo">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary">Simpan</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </section>