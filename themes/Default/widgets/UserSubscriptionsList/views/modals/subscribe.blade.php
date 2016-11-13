<!-- Modal Dialog -->
<div class="modal fade confirmationDialog" id="confirmSubscribeAction" role="dialog" aria-labelledby="confirmSubscribeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="modal-message"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans('frontend.user.subscription.cancel') !!}</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="confirm">{!!trans('frontend.user.subscription.subscribe') !!}</button>
      </div>
    </div>
  </div>
</div>
