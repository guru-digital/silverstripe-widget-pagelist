<ul class="page-listing">
    <% loop RelatedPages %>
    <% if ShowChildren %>
    <% with $Page %>
    <% loop $AllChildren %>
    <li class="$LinkingMode">

        <a href="$Link" class="$LinkingMode" title="Go to the $Title.XML page">
            <span class="text">$MenuTitle.XML</span>
        </a>
    </li>
    <% end_loop %>
    <% end_with %>
    <% else %>
    <% with $Page %>
    <li class="$LinkingMode">
        <a href="$Link" class="$LinkingMode" title="Go to the $Title.XML page">
            <span class="text">$MenuTitle.XML</span>
        </a>
    </li>
    <% end_with %>
    <% end_if %>
    <% end_loop %>
</ul>