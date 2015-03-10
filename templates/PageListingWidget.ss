<div class="panel panel-default side-bar-title">
    <div class="panel-heading">
        <h3 class="panel-title">$Title</h3>
    </div>
</div>
<ul class="nav nav-pills nav-stacked">
    <% loop RelatedPages %>
    <% if ShowChildren %>
    <% with $Page %>
    <% loop $AllChildren %>
    <li role="presentation"  class="<%if $LinkingMode == "current" %>active<%end_if%> $LinkingMode">
        <a href="$Link" class="$LinkingMode" title="Go to the $Title.XML page">
            <span class="text">$MenuTitle.XML</span>
        </a>
    </li>
    <% end_loop %>
    <% end_with %>
    <% else %>
    <% with $Page %>
    <li role="presentation"  class="<%if $LinkingMode == "current" %>active<%end_if%> $LinkingMode">
        <a href="$Link" title="$Title.XML" >
            <a href="$Link" class="$LinkingMode" title="Go to the $Title.XML page">
                <span class="text">$MenuTitle.XML</span>
            </a>
    </li>
    <% end_with %>
    <% end_if %>
    <% end_loop %>
</ul>