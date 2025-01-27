@extends('layouts.master')


{{-- @section('title', 'Admin Dashboard') --}}
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mt-4">
        <h1>Welcome {{ Auth::user()->name }}!!</h1>
        <div class="card-body">
            <a href="{{ route('barangs.create') }}" class="btn btn-md btn-success mb-3">Add</a>
            <br>
            <tr>
                <th colspan="3">
                    List Of Users
                    <a class="btn btn-warning float-end mb-2" href="{{ route('barangs.export') }}"><i
                            class="fa fa-download"></i>
                        Export User Data</a>
                </th>
            </tr>
            <br>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th style="white-space: nowrap;">No</th>
                        <th style="white-space: nowrap;">DSTRC_ORI</th>
                        <th style="white-space: nowrap;">CREATION_DATE</th>
                        <th style="white-space: nowrap;">AUTHSD_DATE</th>
                        <th style="white-space: nowrap;">WO_DESC</th>
                        <th style="white-space: nowrap;">ACUAN PLAN SERVICE</th>
                        <th style="white-space: nowrap;">Componen_Desc</th>
                        <th style="white-space: nowrap;">EGI</th>
                        <th style="white-space: nowrap;">EGI ENG</th>
                        <th style="white-space: nowrap;">EQUIP_NO</th>
                        <th style="white-space: nowrap;">Plant Process</th>
                        <th style="white-space: nowrap;">Plant Activity</th>
                        <th style="white-space: nowrap;">WR_NO</th>
                        <th style="white-space: nowrap;">WR_ITEM</th>
                        <th style="white-space: nowrap;">QTY_REQ</th>
                        <th style="white-space: nowrap;">Stock_Code</th>
                        <th style="white-space: nowrap;">Mnemonic</th>
                        <th style="white-space: nowrap;">PART_NUMBER</th>
                        <th style="white-space: nowrap;">PN_GLOBAL</th>
                        <th style="white-space: nowrap;">ITEM_NAME</th>
                        <th style="white-space: nowrap;">STOCK_TYPE_DISTRICT</th>
                        <th style="white-space: nowrap;">CLASS</th>
                        <th style="white-space: nowrap;">HOME_WH</th>
                        <th style="white-space: nowrap;">UOI</th>
                        <th style="white-space: nowrap;">ISSUING PRICE</th>
                        <th style="white-space: nowrap;">PRICE_CODE</th>
                        <th style="white-space: nowrap;">Notes</th>
                        <th style="white-space: nowrap;">Status</th>
                        <th style="white-space: nowrap;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($wr as $index => $wrs)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $wrs->dstrc_ori }}</td>
                            <td>{{ $wrs->creation_date }}</td>
                            <td>{{ $wrs->authsd_date }}</td>
                            <td>{{ $wrs->wo_desc }}</td>
                            <td>{{ $wrs->acuan_plan_service }}</td>
                            <td>{{ $wrs->componen_desc }}</td>
                            <td>{{ $wrs->egi }}</td>
                            <td>{{ $wrs->egi_eng }}</td>
                            <td>{{ $wrs->equip_no }}</td>
                            <td>{{ $wrs->plant_process }}</td>
                            <td>{{ $wrs->plant_activity }}</td>
                            <td>{{ $wrs->wr_no }}</td>
                            <td>{{ $wrs->wr_item }}</td>
                            <td>{{ $wrs->qty_req }}</td>
                            <td>{{ $wrs->stock_code }}</td>
                            <td>{{ $wrs->mnemonic }}</td>
                            <td>{{ $wrs->part_number}}</td>
                            <td>{{ $wrs->pn_global }}</td>
                            <td>{{ $wrs->item_name}}</td>
                            <td>{{ $wrs->stock_type_district}}</td>
                            <td>{{ $wrs->class }}</td>
                            <td>{{ $wrs->home_wh}}</td>
                            <td>{{ $wrs->uoi }}</td>
                            <td>{{ $wrs->issuing_price}}</td>
                            <td>{{ $wrs->price_code }}</td>
                            <td>{{ $wrs->notes}}</td>
                            <td>{{ $wrs->status }}</td>
                            <td class="d-flex justify-content-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('wrs.destroy', $wrs->id) }}" method="POST" class="d-flex gap-2">
                                    <a href="{{ route('wrs.show', $wrs->id) }}" class="btn btn-sm btn-dark">Show</a>
                                    <a href="{{ route('wrs.edit', $wrs->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="16">
                                <div class="alert alert-danger text-center">
                                    Data Barang belum tersedia.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            //message with sweetalert
            @if (session('success'))
                Swal.fire({
                    icon: "success",
                    title: "BERHASIL",
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @elseif (session('error'))
                Swal.fire({
                    icon: "error",
                    title: "GAGAL!",
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif
        </script>

        <div class="card-footer">
            <div><a href="/logout" class="btn btn-sm btn-secondary">Logout >></a></div>
        </div>
    </div>
@endsection
