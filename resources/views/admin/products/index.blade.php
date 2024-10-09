@extends('client.layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Danh sách sản phẩm</h2>

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Thêm sản phẩm mới</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Hình ảnh</th>
                    <th>Lượt xem</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $product->category_id }}</td>
                        <td>{{ $product->is_active ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" width="100px" alt="">
                            @endif
                        </td>
                        <td>{{ $product->view }}</td>
                        <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $product->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Chi tiết</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</button>
                            </form>
                            <form action="" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa mềm sản phẩm này?')">Xóa mềm</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }} <!-- Phân trang -->
    </div>
@endsection
