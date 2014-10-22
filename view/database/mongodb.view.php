<!-- MongoDB View -->

<div>
    
    <!-- Form AJAX -->
    <div class="sixteen columns">

        <h3>Database MongoDB</h3>

        <div class="seven columns">
            <h5>SELECT</h5>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-show="waitSelectFlag">
                        <td colspan="3">{{ waitSelectMessage }}</td>
                    </tr>
                    <tr ng-repeat="customer in customers.list">
                        <td>{{ $index + 1}}</td>
                        <td>{{ customer.name }}</td>
                        <td>{{ customer.email }}</td>
                    </tr>
                </tbody>
            </table>
            
            <p>
                <button type="button" ng-click="customers.get()">Refresh</button>
            </p>
        </div>

        <div class="seven columns">
            <h5>INSERT</h5>
            
            <form method="post" name="formCustomer" id="formCustomer" ng-submit="customers.insert()">
                <label for="formCustomersName">Customer Name:</label>
                <input type="text" id="formCustomersName" name="formCustomersName" ng-model="customers.data.name" ng-minlength="3"/>

                <label for="formCustomersEmail">Customer Email:</label>
                <input type="text" id="formCustomersEmail" name="formCustomersEmail" ng-model="customers.data.email" ng-minlength="5"/>

                <button type="submit" id="formCustomersSubmit" name="formCustomersSubmit">Submit</button>
            </form>
            
            <p ng-show="waitInsertFlag">
                <code>{{ waitInsertMessage }}</code>
            </p>
        </div>
        
    </div>
    
    <div class="sixteen columns">
        <p><em><strong>Note:</strong> This is a shared Linux hosting without MongoDB sever installed. MongoDB Examples will not work.</em></p>
    </div>
    
</div>