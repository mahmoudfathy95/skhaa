<form method="post">
    @csrf
    <div class="form-body">
        <div class="row">


            <div class="col-md-4">

                <label for="tags">Phones</label>
                <input type="text" name="phone" data-role="tagsinput" value="{{$appsetting->phone}}">
            </div>
            <div class="col-md-4">

                <label for="tags">email</label>
                <input type="text" name="email" data-role="tagsinput"  value="{{$appsetting->email}}">
            </div>
            <div class="col-md-4">

                <label for="">Shipping</label>
                <input type="number" step="any" class="form-control" name="shipping"  value="{{$appsetting->shipping}}">
            </div>
        </div>
<hr/>

        <div class="row">
            <div class="col-md-2">
                <label>Terms And Conditions</label>
            </div>
            <div class="col-md-8">
                <textarea name="terms" class="form-control editor required" required="" id="terms">{{$appsetting->terms}}</textarea> 
            </div>
        </div>
<hr/>
        <div class="row">
            <div class="col-md-2">
                <label>Privacy </label>
            </div>
            <div class="col-md-8">
                <textarea name="privacy" class="form-control editor required" required="" id="privacy">{{$appsetting->privacy}}</textarea> 
            </div>
        </div>
<hr/>
        <div class="row">
            <div class="col-md-2">
                <label>About Use </label>
            </div>
            <div class="col-md-8">
                <textarea name="about" class="form-control editor required" required="" id="about">{{$appsetting->about}}</textarea> 
            </div>
        </div>
<hr/>
        <div class="row">
            <div class="col-md-2">
                <label>Contact Us </label>
            </div>
            <div class="col-md-8">
                <textarea name="contact" class="form-control editor required" required="" id="contact">{{$appsetting->contact}}</textarea> 
            </div>
        </div>



    </div>

    <div class="form-actions">

        <button type="submit" name="save" class="btn btn-primary">
            <i class="fa fa-save"></i> Save
        </button>
    </div>  



</form>

@push('script')
<script src="./assets/backend/tags/tagsinput.js" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function () {
//        var privacy = CKEDITOR.replace('privacy', {extraPlugins: 'notification'});
//        privacy.on('required', function (evt) {
//            privacy.showNotification('This field is required.', 'warning');
//            evt.cancel();
//        });
//        var terms = CKEDITOR.replace('terms', {extraPlugins: 'notification'});
//        terms.on('required', function (evt) {
//            terms.showNotification('This field is required.', 'warning');
//            evt.cancel();
//        });
//        var contact = CKEDITOR.replace('contact', {extraPlugins: 'notification'});
//        contact.on('required', function (evt) {
//            contact.showNotification('This field is required.', 'warning');
//            evt.cancel();
//        });
//        var about = CKEDITOR.replace('about', {extraPlugins: 'notification'});
//        about.on('required', function (evt) {
//            about.showNotification('This field is required.', 'warning');
//            evt.cancel();
//        });
    });
</script>
@endpush