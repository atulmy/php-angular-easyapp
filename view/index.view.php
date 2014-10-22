<!-- Index View -->

<div>
    
    <div class="two-thirds column">
        <h3>Welcome</h3>

        <p><strong>An easy, flexible, very light weight, extendable, small to medium scale application template. Recommended for beginners exploring web technologies. Best suited for <a href="http://en.wikipedia.org/wiki/Single-page_application" target="_blank" title="Single-page application">SPAs</a> and <a href="http://en.wikipedia.org/wiki/Rich_Internet_application" target="_blank" title="Rich Internet application">RIAs</a>. Created using:</strong></p>
        
        <ul class="circle">
            <li ng-repeat="component in index_data.easy_app_components">
                <a href="{{component.url}}" target="_blank"><strong>{{component.name}}</strong></a> <em>({{component.description}})</em>
            </li>
        </ul>
        
    </div>
    
    <div class="one-third column">
        <h3>Change Log</h3>
        
        <ul class="square">
            <li>
                <strong>v 0.1</strong> <em>(2014-10-21)</em>: Initial release.
            </li>
        </ul>
    </div>
    
</div>