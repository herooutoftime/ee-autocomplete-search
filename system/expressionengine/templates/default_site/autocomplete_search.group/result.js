[
{exp:search:search_results}
{
    "channel": "{channel_title}",
    "value": "{exp:autocomplete_search:clean}{title}{/exp:autocomplete_search:clean}",
    "url": "{page_url}",
    "uri": "{auto_path}",
    "crumb": "{exp:structure:breadcrumb uri="/{auto_path}/" here_as_title="yes"}",
    "tokens": ["{exp:autocomplete_search:split value="{title}" delimiter=" " join=","}"]
}{if count != total_results},{/if}
{/exp:search:search_results}
]
