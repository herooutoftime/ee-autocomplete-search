jQuery(document).ready(function($) {

    var bestGuess = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: '/autocomplete_search?keywords=%QUERY'
            ,wildcard: '%QUERY'
        }
    });

    $('#keywords').typeahead({
        hint: true
        ,highlight: true
        ,minLength: 2
    },
    {
      name: 'best-guess'
      ,display: 'value'
      ,source:  bestGuess
      ,limit: 25
      ,templates: {
          suggestion: function(e) {
              return '<div>'+ e.value + '</div>';
          },
          empty: function(ctx) {
            console.log(ctx);
            return ctx.query;
          }
      }
    });
    $('#keywords').bind('typeahead:select', function(ev, suggestion) {
      console.log(suggestion);
      window.location.href = suggestion.url;
    });
});
