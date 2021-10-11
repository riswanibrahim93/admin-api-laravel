@extends('layout/main')

@section('title', 'Admin | Data Psikolog')
@section('container')
	<div class="container">
		<br><br>
		<h3 align="center">Kelola Psikolog</h3>
		<hr>
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif
		<button type="button" class="btn btn-success mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">Tambah Psikolog</button>
		<!-- Modal Ubah -->
		<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		      	<strong>
		        	<h5 class="modal-title" id="exampleModalLabel">Tambah Psikolog</h5>
		      	</strong>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <form action="/dataPsikolog" method="POST">
					@csrf
					<div class="form-group row mb-2">
						<label class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="input" class="form-control @error('nama') is-invalid @enderror" placeholder="masukkan nama psikolog" name="nama" id="nama" autocomplete="off" value="{{ old('nama') }}">
						</div>
					</div>
					<div class="form-group row mb-2">
						<label class="col-sm-2 col-form-label">Bidang</label>
						<div class="col-sm-10">
							<input type="input" class="form-control @error('bidang') is-invalid @enderror" placeholder="masukkan bidang psikolog" name="bidang" autocomplete="off" value="{{ old('bidang') }}">
						</div>
					</div>
					<div class="form-group row mb-2">
						<label class="col-sm-2 col-form-label">No.Telepon</label>
						<div class="col-sm-10">
							<input type="input" class="form-control @error('tlv') is-invalid @enderror" placeholder="masukkan no.tlv psikolog" name="tlv" autocomplete="off" value="{{ old('tlv') }}">
						</div>
					</div>
					<div class="form-group row mb-2">
						<label class="col-sm-2 col-form-label">Deskripsi</label>
						<div class="col-sm-10">
							<input type="input" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="masukkan deskripsi psikolog" name="deskripsi" autocomplete="off" value="{{ old('deskripsi') }}">
						</div>
					</div>
					<div class="form-group row mb-2">
						<label class="col-sm-2 col-form-label">Gambar</label>
						<div class="col-sm-10">
							<input type="input" class="form-control @error('gambar') is-invalid @enderror" placeholder="masukkan gambar psikolog" name="gambar" autocomplete="off" value="{{ old('gambar') }}">
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
					<td><b>Nama</b></td>
					<td><b>Bidang</b></td>
					<td><b>No.Telepon</b></td>
					<td><b>Gambar</b></td>
					<td><b>Deskripsi</b></td>
					<td><b>Kelola</b></td>
				</tr>
				@foreach($data as $b)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $b->nama }}</td>
					<td>{{ $b->bidang }}</td>
					<td>{{ $b->tlv }}</td>
					<td>{{ $b->gambar }}</td>
					<td>{{ $b->deskripsi }}</td>
					<td>
						<!-- <a href="" class="btn btn-info">Ubah</a> -->
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-info mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $b->nama }}">
						  Ubah
						</button>

						<!-- Modal Ubah -->
						<div class="modal fade" id="exampleModal{{ $b->nama }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						      	<strong>
						        	<h5 class="modal-title" id="exampleModalLabel">Ubah data {{ $b->nama }}</h5>
						      	</strong>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>
						      <div class="modal-body">
						        <form action="/dataPsikolog/{{ $b->id }}" method="post">
									@method('put')
									@csrf
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Nama</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('nama') is-invalid @enderror" placeholder="masukkan nama psikolog" name="nama" id="nama" autocomplete="off" value="{{ $b->nama }}">
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Bidang</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('bidang') is-invalid @enderror" placeholder="masukkan bidang psikolog" name="bidang" autocomplete="off" value="{{ $b->bidang }}">
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">No.Telepon</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('tlv') is-invalid @enderror" placeholder="masukkan tlv psikolog" name="tlv" autocomplete="off" value="{{ $b->tlv }}">
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Deskripsi</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="masukkan deskripsi psikolog" name="deskripsi" autocomplete="off" value="{{ $b->deskripsi }}">
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Gambar</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('gambar') is-invalid @enderror" placeholder="masukkan gambar psikolog" name="gambar" autocomplete="off" value="{{ $b->gambar }}">
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

						<form action="dataPsikolog/{{ $b->id }}" method="post" class="d-inline">
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