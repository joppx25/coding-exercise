<x-mail::message>
# Introduction

<h3>Product #{{ $product['sku'] }}</h3> <br>
<p>{{ $product['description'] }}</p>
<p><b>Price: ${{ $product['price'] }}</b></p>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
