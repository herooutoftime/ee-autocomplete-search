jQuery(document).ready(function($) {

    var bestGuess = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: '/autocomplete_search/?keywords=%QUERY'
            // ,replace: function(url, query) {
            //     console.log('hello!');
            //     return url + "#" + query;
            // }
            // ,prepare: function(jqXhr, settings){
            //         console.log('hello!');
            //         settings.data = $.param({q: queryInput.val()})
            //     // },
            //     // data: {
            //     //     query: 'TEST'
            //     // }
            //     // ,type: "POST"
            //
            // }
            ,wildcard: '%QUERY'
        }
    });

    $('#keywords').typeahead({
        hint: true
        ,highlight: true
        ,minLength: 3
    },
    {
      name: 'best-guess'
      ,display: 'value'
      ,source:  bestGuess
      ,limit: 25
      ,templates: {
          suggestion: function(e) {
              return '<div>'+ e.value + '</div>';
          }
      }
    });
    $('#keywords').bind('typeahead:select', function(ev, suggestion) {
      console.log(suggestion);
      window.location.href = suggestion.url;
    });
});
