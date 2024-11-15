@extends('admin.layouts.master')

@section('title')
    Quản lý đơn hàng
@endsection
@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35 mt-3">Danh sách Đơn hàng</h3>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="table-data__tool">
                    <form class="form-inline" method="GET">
                        <div class="form-group mr-3">
                            <label for="status">Trạng thái:</label>
                            <select class="form-control ml-2" name="status" id="status">
                                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Tất cả</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->name_status }}"
                                        {{ request('status') == $status->name_status ? 'selected' : '' }}>
                                        {{ $status->status_label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mr-3">
                            <label for="date">Ngày đặt:</label>
                            <input type="date" class="form-control ml-2" name="date" id="date"
                                value="{{ request('date') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </form>
                    <div class="table-data__tool-right">
                        <a href="{{ route('admin.products.create') }}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Thêm</button>
                        </a>

                    </div>
                </div>
                <div class="flex flex-col items-start gap-5 md:flex-row md:items-center md:justify-between">
                    <div class="flex flex-wrap gap-x-6 gap-y-4">
                        <a href="{{ route('admin.orders.index', ['status' => 'all']) }}" class="mr-3" style="color: black">Tất cả <span
                                class="small border border-2 rounded bg-body-secondary p-2 ml-1">({{ $totalOrder }})</span></a>
                        @foreach ($countOrderByStatus as $item)
                            @if ($item->status_order_id == 5 || $item->status_order_id == 7)
                                @continue
                            @else
                                <a href="{{ route('admin.orders.index', ['status' => $item->name_status]) }}" class="mr-3 text-capitalize">{{ $item->name_status }}<span
                                        class="small border border-2 rounded bg-body-secondary p-2 ml-1">({{ $item->total }})</span></a>
                            @endif
                        @endforeach
                    </div>
                    <br />
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã đơn hàng</th>
                                <th>Khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="tr-shadow">
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        ORDER-01
                                    </td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->total_price }} đ</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>

                                                @foreach ($order->statusOrder as $c_status)
                                                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status_order" class="form-select w-75"
                                                            onchange="confirmSubmit(this)"
                                                            data-default-value='{{ $c_status['id_status'] }}'>
                                                            @foreach ($statuses as $status)
                                                                <option value="{{ $status->id }}"
                                                                    {{ $c_status['id_status'] == $status->id ? 'selected' : '' }}
                                                                    {{ $c_status['id_status'] == 6 ? 'disabled' : '' }}
                                                                    {{ $c_status['id_status'] == 8 ? 'disabled' : '' }}>
                                                                    {{ $status->status_label }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                @endforeach

                                            </td>
                                            <td>
                                                <div class="table-data-feature">

                                            {{-- Xem chi tiết  --}}
                                            <a href="{{ route('admin.orders.show',$order->id) }}">
                                                <button class="item mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="Xem chi tiết đơn hàng">
                                                    <i class="fas fa-eye"></i>
                                                </button></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/vi.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        if (event && !event.defaultPrevented) {
            const toast = new bootstrap.Toast(document.getElementById('orderStatusToast'));
            toast.show();

        }

        document.addEventListener("DOMContentLoaded", function() {
            moment.locale('vi');

            const timeElements = document.querySelectorAll('[id^="order-time-"]');

            if (timeElements) {
                timeElements.forEach(timeElement => {
                    const dateTime = timeElement.getAttribute('data-time');
                    const timeAgo = moment(dateTime).fromNow();
                    timeElement.innerText = timeAgo;
                })
            }
        });

        function confirmSubmit(selectElement) {
            var form = selectElement.form;
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');

            if (confirm('Bạn có chắc chắn thay đổi trạng thái đơn hàng thành "' + selectedOption + '" không ?')) {
                form.submit();
            } else {
                selectElement.value = defaultValue;
            }
        }

        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');

                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 3000);
    </script>
@endsection
