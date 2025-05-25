<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    {{-- Basic styling - can be replaced/enhanced with Tailwind later --}}
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f4f4f4; color: #333; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 20px; }
        .product-card { border: 1px solid #ddd; border-radius: 4px; padding: 15px; background-color: #fff; }
        .product-card img { max-width: 100%; height: auto; border-bottom: 1px solid #eee; margin-bottom: 10px; }
        .product-card h3 { margin-top: 0; font-size: 1.2em; }
        .product-card p { font-size: 0.9em; color: #555; }
        .product-price { font-weight: bold; color: #007bff; margin-top: 10px; }
        .no-products { text-align: center; padding: 20px; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Our Products</h1>

        @if(isset($products) && $products->isNotEmpty())
            <div class="product-grid">
                @foreach ($products as $product)
                    <div class="product-card">
                        {{-- Assuming image_url_front_template holds a relevant display image for the product listing --}}
                        @if($product->image_url_front_template)
                            <img src="{{ asset($product->image_url_front_template) }}" alt="{{ $product->name }} front">
                        @else
                            <div style="height:200px; background:#eee; display:flex; align-items:center; justify-content:center;">No image</div>
                        @endif
                        <h3>{{ $product->name }}</h3>
                        <p>{{ Str::limit($product->description, 100) }}</p>
                        <div class="product-price">${{ number_format($product->base_price, 2) }}</div>
                        {{-- Link to a product detail page (to be created later) --}}
                        {{-- <a href="{{ route('products.show', $product->id) }}">View Details</a> --}}
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-products">
                <p>No products available at this time.</p>
            </div>
        @endif
    </div>
</body>
</html>
