<!-- Modal Dialog -->
<div class="modal fade confirmationDialog" id="contactAction" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="sendMailForm" class="form-horizontal" data-url='{{ route("ad.contact", [$ad->id]) }}'>
      {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4><i class="fa fa-envelope"></i> {!! trans('frontend.ad.contact.contact_announcer') !!}</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">{!! trans('frontend.ad.contact.name') !!}</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">{!! trans('frontend.ad.contact.email') !!}</label>
            <div class="col-sm-10">
              <input type="text" name="email" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">{!! trans('frontend.ad.contact.phone_number') !!}</label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">{!! trans('frontend.ad.contact.message') !!}</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="message" rows="5"></textarea>
            </div>
          </div>
          <div id="contact-response">
            <div id="contact-respose-fail" class="alert alert-danger hide"></div>
            <div id="contact-respose-success" class="alert alert-success hide"></div>
            <div id="contact-respose-error" class="alert alert-danger hide">
              {!! trans('frontend.ad.contact.ad_not_yet_validated') !!}
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('frontend.ad.contact.cancel') !!}</button>
          <button type="submit" class="btn btn-success" id="confirm">{!! trans('frontend.ad.contact.send') !!}</button>
        </div>
      </form>
    </div>
  </div>
</div>
