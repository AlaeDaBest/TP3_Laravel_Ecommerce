import axios from "axios";
import React, { useEffect, useState } from "react";
import Customer from "./Customer";
const CustomersList=()=>{
    const [customers,setCustomers]=useState([]);
    useEffect(()=>{
        axios.get('/customers')
        .then(response=>{
            console.log(response);
            setCustomers(response.data);
        })
        .catch(error=>console.log('There was an error fetching customers',error));
    },[])
    console.log(customers);
    return(
        <div>
            {customers.map(item=>(
                <Customer key={item.id} customer={item} />
            ))}          
        </div>
    )
}
export default CustomersList;