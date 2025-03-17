export type Employee = {
    "id": number,
    "name": string,
    "position": string,
    "created_at": Date,
    "updated_at": Date,
    "tasks": Task[]
}

export type Task = {
    "id": number,
    "employee_id": number,
    "task_name": string,
    "due_date": Date,
}