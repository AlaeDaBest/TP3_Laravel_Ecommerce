import React from "react";
const Customer=(props)=>{
    return(
        <div>
            <h1>Full Name : {props.customer.full_name} </h1>
            <p>Email : {props.customer.email} </p>
        </div>
    )
}
export default Customer;