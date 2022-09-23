import React, {PropsWithChildren} from "react";

export interface TestProps {
    name: string;
    age: number;
    color?: string | null;
}

const Test = (props: PropsWithChildren<TestProps>): JSX.Element => {
    return (
        <div
            style={{
                background: props.color ?? '#fff'
            }}
        >
            <h1> { props.name }</h1>
            <div>
                { props.children }
            </div>
        </div>
    )
};

export default Test;