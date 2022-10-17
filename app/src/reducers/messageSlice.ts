import { createSlice, PayloadAction } from "@reduxjs/toolkit";

export interface MessageState {
        groupId: number,
        message: string | null,
        createdAt: string | null,
        status: string | null,
        messageId: number | null,
}

export interface MessageObjectState {
    messages: MessageState[],
}

const initialState: MessageObjectState = {
        messages:[{
            'groupId': 0,
            'message': null,
            'createdAt': null,
            'status': null,
            'messageId': null,
        }]
}

const messageSlice = createSlice({
    name: "message",
    initialState,
    reducers: {
        updateMessages(state, action: PayloadAction<MessageObjectState>){
            state.messages = action.payload.messages;
        }
    }
});

export const { updateMessages } = messageSlice.actions;
export default messageSlice.reducer;