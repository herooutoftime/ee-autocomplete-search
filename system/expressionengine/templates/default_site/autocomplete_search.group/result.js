[
{exp:search:search_results}
{
    "channel": "{channel_title}",
    "channel_i18n": "{exp:transcribe:replace name="channel-{channel_name}"}",
    "value": "{exp:autocomplete_search:clean}{title}{/exp:autocomplete_search:clean}",
    "url": "{exp:autocomplete_search:url original="{page_url}" channel="{channel_id}" entry_id="{entry_id}" file_url="{files}{file:url},{/files}"}",
    "uri": "{auto_path}",
    "crumb": "{exp:structure:breadcrumb uri="/{auto_path}/" here_as_title="yes"}",
    "tokens": ["{exp:autocomplete_search:split value="{title}" delimiter=" " join=","}"],
    "thumb": "{images}"
}{if count != total_results},{/if}
{/exp:search:search_results}
]
