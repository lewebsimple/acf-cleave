(function ($) {

  function initialize_field ($field) {
    const $cleave = $field.find('.acf-cleave');
    const options = $cleave.data('cleave');
    const  cleave = new Cleave($field.find('input'), options);
  }

  acf.add_action('ready_field/type=cleave', initialize_field);
  acf.add_action('append_field/type=cleave', initialize_field);

  // TODO Validation hooks
  // @see https://www.advancedcustomfields.com/resources/javascript-api/#filters-validation_complete

})(jQuery);
