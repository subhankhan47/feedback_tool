<x-app-layout>

    <div class="container mt-4">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-12 col-md-4 col-lg-4 mb-3">
                    <div class="card h-100">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ strlen($product->description) > 100 ? substr($product->description, 0, 100) . '...' : $product->description }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Price: ${{ number_format($product->price, 2) }}</small>
                            <hr class="my-2">
                            <div class="d-flex justify-between">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#feedbackModal" data-product-id="{{ $product->id }}">Submit FeedBack</button>

                                <a href="{{ route('showProductFeedback', ['pid' => $product->id]) }}">
                                    <button class="btn btn-secondary btn-sm">All FeedBacks</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @include('partials.feedbackModal')
        </div>

        <!-- Pagination Links for paginating to 10 Cards Per Page -->
        <div class="d-flex justify-content-center my-3">
            {!! $products->links() !!}
        </div>
    </div>


    <!--   This will update the modal hidden product Id  -->
    <script>
        var feedbackModal = document.getElementById('feedbackModal');
        feedbackModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var productId = button.getAttribute('data-product-id');
            var modalInput = feedbackModal.querySelector('#productModalInput');
            modalInput.value = productId;
        });
    </script>


</x-app-layout>
