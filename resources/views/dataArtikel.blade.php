@extends('layout/main')

@section('title', 'Admin | Data Artikel')
@section('container')
	<div class="container">
		<br><br>
		<h3 align="center">Kelola Artikel</h3>
		<hr>
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif
		<button type="button" class="btn btn-success mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">Tambah Artikel</button>
		<!-- Modal Ubah -->
		<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		      	<strong>
		        	<h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
		      	</strong>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <form action="/dataArtikel" method="POST">
					@csrf
					<div class="form-group row mb-2">
						<label class="col-sm-2 col-form-label">Judul</label>
						<div class="col-sm-10">
							<input type="input" class="form-control @error('judul') is-invalid @enderror" placeholder="scan barcode" name="judul" id="judul" autocomplete="off" value="{{ old('judul') }}">
						</div>
					</div>
					<div class="form-group row mb-2">
						<label class="col-sm-2 col-form-label">Penerbit</label>
						<div class="col-sm-10">
							<input type="input" class="form-control @error('penerbit') is-invalid @enderror" placeholder="masukkan penerbit barang" name="penerbit" autocomplete="off" value="{{ old('penerbit') }}">
						</div>
					</div>
					<div class="form-group row mb-2">
						<label class="col-sm-2 col-form-label">Deskripsi</label>
						<div class="col-sm-10">
							<input type="input" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="masukkan deskripsi barang" name="deskripsi" autocomplete="off" value="{{ old('deskripsi') }}">
						</div>
					</div>
					<div class="form-group row mb-2">
						<label class="col-sm-2 col-form-label">gambar</label>
						<div class="col-sm-10">
							<input type="input" class="form-control @error('gambar') is-invalid @enderror" placeholder="masukkan gambar barang" name="gambar" autocomplete="off" value="{{ old('gambar') }}">
						</div>
					</div>
					<div class="form-group row mb-2">
						<label class="col-sm-2 col-form-label">link</label>
						<div class="col-sm-10">
							<input type="input" class="form-control @error('link') is-invalid @enderror" placeholder="masukkan link barang" name="link" autocomplete="off" value="{{ old('link') }}">
						</div>
					</div>
					<div align="right">
						<button class="btn btn-info" type="submit">Tambah</button>
						<button class="btn btn-danger" type="reset">Reset</button>
					</div>
				</form>
		      </div>
		    </div>
		  </div>
		</div>
	
		
	@if (session('hapus'))
		<br>
	    <div class="alert alert-danger">
	        {{ session('hapus') }}
	    </div>
	@endif
	@if (session('update'))
		<br>
	    <div class="alert alert-info">
	        {{ session('update') }}
	    </div>
	@endif
		
		<div class="tb_barang" id="barang" >
			<table class="table table-striped">
				<tr class="bg-dark text-white">
					<td><b>No</b></td>
					<td><b>Judul</b></td>
					<td><b>Penerbit</b></td>
					<td><b>Gambar</b></td>
					<td><b>Deskripsi</b></td>
					<td><b>Link</b></td>
					<td><b>Kelola</b></td>
				</tr>
				@foreach($data as $b)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $b->judul }}</td>
					<td>{{ $b->penerbit }}</td>
					<td>{{ $b->gambar }}</td>
					<td>{{ $b->deskripsi }}</td>
					<td>{{ $b->link }}</td>
					<td>
						<!-- <a href="" class="btn btn-info">Ubah</a> -->
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-info mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $b->judul }}">
						  Ubah
						</button>

						<!-- Modal Ubah -->
						<div class="modal fade" id="exampleModal{{ $b->judul }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						      	<strong>
						        	<h5 class="modal-title" id="exampleModalLabel">Ubah data {{ $b->judul }}</h5>
						      	</strong>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>
						      <div class="modal-body">
						        <form action="/dataArtikel/{{ $b->id }}" method="post">
									@method('put')
									@csrf
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Judul</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('judul') is-invalid @enderror" placeholder="scan barcode" name="judul" id="judul" autocomplete="off" value="{{ $b->judul }}">
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Penerbit</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('penerbit') is-invalid @enderror" placeholder="masukkan penerbit barang" name="penerbit" autocomplete="off" value="{{ $b->penerbit }}">
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Deskripsi</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="masukkan deskripsi barang" name="deskripsi" autocomplete="off" value="{{ $b->deskripsi }}">
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Gambar</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('gambar') is-invalid @enderror" placeholder="masukkan gambar barang" name="gambar" autocomplete="off" value="{{ $b->gambar }}">
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Link</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('link') is-invalid @enderror" placeholder="masukkan link barang" name="link" autocomplete="off" value="{{ $b->link }}">
										</div>
									</div>
									<div align="right">
										<button class="btn btn-info" type="submit">Ubah</button>
										<button class="btn btn-danger" type="reset">Reset</button>
									</div>
								</form>
						      </div>
						    </div>
						  </div>
						</div>

						<form action="dataArtikel/{{ $b->id }}" method="post" class="d-inline">
							@method('delete')
							@csrf
							<button type="submit"class="btn btn-danger mb-1">Hapus</button>
						</form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection