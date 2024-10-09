@extends('client.layouts.master')


@section('title', 'Quản lý danh mục')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Danh sách danh mục</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Tạo sản Danh sách</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Hình ảnh</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" width="100px" alt="">
                            @endif
                        </td>
                        <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $product->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('categories.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</button>
                            </form>
                            <form action="" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa mềm sản phẩm này?');">Xóa
                                    mềm</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Hiển thị phân trang -->
        {{ $categories->links() }}
    </div>
@endsection
