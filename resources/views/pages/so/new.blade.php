@extends('layouts.master')
@section('content')
<div id="app">
	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-md-12 col-12">
				<div class="card">
					<div class="card-header">
						<div class="head-label">
						<h6 class="mb-0">
							PENGELUARAN PEMBELIAN
						</h6>
						</div>
					</div>
					<form class="form form-horizontal" method="POST" action="{{ route('soInsert')}}">
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="col-md-3">
									<div class="mb-1">
										<label class="col-form-label" for="kode">Kode</label>
										<input type="text" id="kode" name="o[kode]" class="form-control" v-model="form.kode" required="true" readonly="true"/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="mb-1">
										<label class="col-form-label" for="tanggal">Tanggal</label>
										<input type="date" autocomplete="off" name="o[tanggal]" id="tanggal" class="form-control" v-model="form.tanggal" required="true" placeholder="yyyy-mm-dd"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-1">
										<label class="col-form-label" for="customer">Customer</label>
										<v-select placeholder="..." class="style-chooser" label="nama" @input="(c) => { !c ? resetForm() : getCustomer() }" :options="customers" v-model="customer"></v-select>
										<input type="text" hidden name="o[customer_id]" v-model="form.customer_id"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-1">
										<label class="col-form-label" for="sales">Seller</label>
										<v-select placeholder="..." class="style-chooser" label="nama" @input="(s) => { if(s) getSeller() }" :options="sellers" v-model="seller"></v-select>
										<input type="text" hidden name="o[seller_id]" v-model="form.seller_id">
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="mb-1">
										<label class="col-form-label" for="jumlah">Jumlah</label>
										<input type="number" autocomplete="off" name="o[jumlah]" id="jumlah" class="form-control" v-model="form.jumlah"  required="true" placeholder="0" readonly="true"/>
									</div>
								</div>
							</div>
						</div>
						<div class="card-header bg-light">
							<button :disabled="customer === null" type="button" data-bs-toggle="modal" data-bs-target="#modalToggle" class="btn btn-primary waves-effect">
								<i data-feather="plus"></i>
								Tambah Item
							</button>
						</div>
						<table class="table table-bordered" id="itemTable">
							<thead>
								<tr>
									<th>PRODUK</th>
									<th class="text-end">QTY</th>
									<th class="text-end">HARGA</th>
									<th class="text-end">JUMLAH</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(item, i) in form.items">
									<td>@{{item.nama}}
										<input type="text" hidden :name="'items['+i+'][product_id]'" v-model="item.product_id"/>
										<input type="text" hidden :name="'items['+i+'][nama]'" v-model="item.nama"/>
										<input type="number" hidden :name="'items['+i+'][harga]'" v-model="item.harga"/>
										<input type="number" hidden :name="'items['+i+'][qty]'" v-model="item.qty"/>
										<input type="number" hidden :name="'items['+i+'][jumlah]'" v-model="item.jumlah"/>
									</td>
									<td class="text-end">@{{item.qty}}</td>
									<td class="text-end">Rp.@{{formatPrice(item.harga)}}</td>
									<td class="text-end">Rp.@{{formatPrice(item.jumlah)}}</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="3">TOTAL</th>
									<th id="_total" class="text-end">Rp.@{{formatPrice(totalItems)}}</th>
								</tr>
							</tfoot>
						</table>
						<div class="card-body">
							<div class="d-grid">
								<button type="submit" class="btn btn-primary waves-effect" :disabled="!form.jumlah > 0">Buat Pesanan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalToggleLabel">Add Item</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
					<div class="modal-body">
						<label v-if="warn" style="color: red">Harga produk untuk jenis customer ini belum di atur!</label>
						<label v-if="error" style="color: red">Terjadi kesalahan pada sistem!</label>
					<div class="mb-1">
						<label class="col-form-label">Produk</label>
						<v-select
							placeholder="..."
							class="style-chooser"
							label="nama"
							@input="(product) => { product ? getProduct() : resetItem() }"
							:options="products"
							v-model="product">
						</v-select>
						</div>
					<div class="mb-1">
						<label class="col-form-label" for="_harga">Harga</label>
						<input type="text" v-model="item.harga" class="form-control" placeholder="0" required="true" readonly/>
					</div>
					<div class="mb-1">
						<label class="col-form-label">QTY</label>
						<input type="number" id="_qty" v-model="item.qty" class="form-control" placeholder="0" required="true"/>
					</div>
				</div>
				<div class="modal-footer">
					<button :disabled="!(item.harga && item.qty)" class="btn btn-primary" v-on:click="addItem" id="add-btn">
						Tambah Item
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/vue-select@3.0.0"></script>
<script>
Vue.component('v-select', VueSelect.VueSelect);
const item = () => {
	return {
		product_id: null,
		nama: null,
		harga: null,
		qty: null,
		jumlah: null
	}
} 
const form = () => {
	return {
		kode: 'SO-{{$time}}',
		tanggal: null,
		customer_id: null,
		seller_id: null,
		jumlah: null,
		items: []
	}
}
new Vue({
  el: '#app',
  data() {
		return {
			customers: {!!json_encode($customers)!!},
			products: {!!json_encode($products)!!},
			sellers: {!!json_encode($sales)!!},
			warn: false,
			error: false,
			customer: null,
			product: null,
			seller: null,
			total: null,
			form: form(),
			item: item()
		}
	},
	computed: {
		totalItems: function() {
			let total = 0
			this.form.items.forEach(i => {
				total += i.jumlah
			})
			this.form.jumlah = total
			return total
		}
	},
	methods: {
		formatPrice(value) {
			let val = (value / 1).toFixed(0).replace('.', ',')
			return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')
		},
		getCustomer() {
			this.form.customer_id = this.customer.id
		},
		getSeller() {
			this.form.seller_id = this.seller.id
		},
		resetItem() {
			this.item = item()
			this.product = null
			this.warn = false
		},
		resetForm() {
			this.form = form()
			this.item = item()
			this.product = null
			this.seller = null
			this.warn = false
		},
		async getProduct() {
			try {
				const res = await axios.post(`{{url('api/harga-product')}}/${this.product.id}/${this.customer.type_id}`)
				if (res.status == 200 && (res.data.harga)) {
					this.warn = false
					this.error = false
					this.item.product_id = this.product.id
					this.item.nama = this.product.nama
					this.item.harga = res.data.harga
				} else {
					this.warn = true
					this.item = item()
				}
			} catch (e) {
				this.error = true
				this.item = item()
			}
		},
		addItem() {
			this.item.jumlah = parseInt(this.item.qty) * this.item.harga
			this.form.items.push(this.item)
			this.total = this.jumlah
			this.product = null
			this.item = item()
			$('#modalToggle').modal('hide')
		}
	}
})
</script>
@endsection