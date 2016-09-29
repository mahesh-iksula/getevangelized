<html>
<body>
<form action="submit.php" name="add_form" method="POST">
<div class="delivery-add-right"><div class="form-item form-type-textarea form-item-address1">
  <label for="edit-address1">Source Address:<span class="form-required" title="This field is required.">*</span></label>
 <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea"><textarea placeholder="Enter your address" maxlength="100" id="edit-address1" name="src_address" cols="60" rows="5" class="form-textarea required"></textarea><div class="grippie"></div></div> <span class="field-suffix"></span>
</div>
<div class="form-item form-type-textarea form-item-address2">
  <label for="edit-address2">Destination Address:</label>
 <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea"><textarea placeholder="Enter your address" maxlength="100" id="edit-address2" name="dest_address" cols="60" rows="5" class="form-textarea"></textarea><div class="grippie"></div></div> <span class="field-suffix"></span>
</div>
<div id="dropdown-second-replace"><div class="form-item form-type-textfield form-item-city entered">
  <label for="edit-city">City <span class="form-required" title="This field is required.">*</span></label>
 <input type="text" id="edit-city" name="city" value="" size="60" maxlength="128" class="form-text required jquery-once-3-processed" >
</div>
<div class="form-item form-type-textfield form-item-state entered">
  <label for="edit-state">State <span class="form-required" title="This field is required.">*</span></label>
 <input type="text" id="edit-state" name="state" value="" size="60" maxlength="128" class="form-text required jquery-once-3-processed" >
</div>
<input type="submit" valur="Submit" />
</div></div>
</form>
</body>
</html>