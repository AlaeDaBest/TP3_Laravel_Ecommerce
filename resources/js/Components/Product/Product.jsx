import React from "react";
const Product=(props)=>{
    return(
        <div>
            <section>
                <img src="{props.product.image}" alt="" />
            </section>
            <section>
                <h3>{props.product.name}</h3>
                <p>{props.product.price}</p>
                <p>{props.product.descriptions}</p>
                <p>{props.product.category}</p>
            </section>
        </div>
    )
}
export default Product;