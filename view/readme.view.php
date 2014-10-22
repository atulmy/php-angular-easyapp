<!-- Readme View -->

<div class="two-thirds column">
    <h3>Readme</h3>

    <div>
        <p><strong>1. Folder Structure</strong></p>
        <pre class="code">
        easyapp
        ├── classes
        ├── includes
        ├── logs
        ├── static
        │   ├── css
        │   ├── files
        │   ├── images
        │   └── js
        │       └── libraries
        └── view
            ├── elements
            └── layouts
        </pre>
    </div>
    
    <div>
        <p><strong>2. Sample Database</strong></p>
        
        <p><em>MySQL</em></p>
        <pre class="code">
        // Create Database
        CREATE DATABASE IF NOT EXISTS `easyapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
        
        // Create sample table 'customers'
        CREATE TABLE IF NOT EXISTS `customers` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(150) NOT NULL,
            `email` varchar(150) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
        </pre>
        
        
        <p><em>MongoDB</em></p>
        <pre class="code">
        // Create Database
        use easyapp
        
        // Create sample collection 'customers'
        db.createCollection("customers")
        </pre>
    </div>
    
    <div>
        <p><strong>3. Author</strong></p>
        <p>Atul Yadav</p>
        <p><a href="mailto:info@atulmy.com">info@atulmy.com</a></p>
    </div>
    
    <ul class="circle">
        <li ng-repeat="component in index_data.easy_app_components">
            <a href="{{component.url}}" target="_blank"><strong>{{component.name}}</strong></a> <em>({{component.description}})</em>
        </li>
    </ul>
</div>