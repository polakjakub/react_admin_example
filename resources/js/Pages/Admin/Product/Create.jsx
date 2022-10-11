import React from 'react';
import Authenticated from '@/Layouts/AuthenticatedLayout';
import {Head, useForm, Link, usePage} from '@inertiajs/inertia-react';

export default function Dashboard(props) {

    const { suppliers } = usePage().props;
    const { data, setData, errors, post } = useForm({
        name: "",
        price: "",
        supplier_id: "",
    });

    function handleSubmit(e) {
        e.preventDefault();
        post(route("products.store"));
    }

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Vytvořit Položku</h2>}
        >
            <Head title="Products" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">

                            <div className="flex items-center justify-between mb-6">
                                <Link
                                    className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                    href={ route("products.index") }
                                >
                                    Zpět
                                </Link>
                            </div>

                            <form name="createForm" onSubmit={handleSubmit}>
                                <div className="flex flex-col">
                                    <div className="mb-4">
                                        <label className="">Dodavatel</label>
                                        <select
                                            className="w-full px-4 py-2"
                                            value={data.supplier_id}
                                            name="supplier_id"
                                            onChange={(e) =>
                                                setData("supplier_id", e.target.value)
                                            }
                                        >
                                        {suppliers.map(({ id, name }) => (
                                            <option value={ id }>{ name }</option>
                                        ))}
                                        </select>
                                        <span className="text-red-600">
                                            {errors.supplier_id}
                                        </span>
                                    </div>
                                </div>
                                <div className="flex flex-col">
                                    <div className="mb-4">
                                        <label className="">Název</label>
                                        <input
                                            type="text"
                                            className="w-full px-4 py-2"
                                            label="Název"
                                            name="name"
                                            value={data.name}
                                            onChange={(e) =>
                                                setData("name", e.target.value)
                                            }
                                        />
                                        <span className="text-red-600">
                                            {errors.name}
                                        </span>
                                    </div>
                                </div>
                                <div className="flex flex-col">
                                    <div className="mb-4">
                                        <label className="">Cena</label>
                                        <input
                                            type="number"
                                            className="w-full px-4 py-2"
                                            label="Cena"
                                            name="price"
                                            step=".01"
                                            value={data.price}
                                            onChange={(e) =>
                                                setData("price", e.target.value)
                                            }
                                        />
                                        <span className="text-red-600">
                                            {errors.price}
                                        </span>
                                    </div>
                                </div>
                                <div className="mt-4">
                                    <button
                                        type="submit"
                                        className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                                    >
                                        Uložit
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}
