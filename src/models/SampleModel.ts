import BaseModel from '@/common/base/BaseModel';

export default class SampleModel extends BaseModel {
  protected static MODEL_NAME = 'sample';

  /**
   * Select All
   */
  public static async index(): Promise<Array<SampleStyle>> {
    return await super.index();
  }

  /**
   * Select
   */
  public static async show(id: number): Promise<SampleStyle> {
    const data = await super.show(id);

    if (data !== null) {
      return data;
    } else {
      return {
        id: -1,
        hoge: '',
        fuga: '',
        piyo: ''
      };
    }
  }

  /**
   * Create
   */
  public static async store(data: SampleStyle): Promise<void> {
    await super.store(data);

    return;
  }

  /**
   * Update
   */
  public static async update(id: number, data: SampleStyle): Promise<void> {
    await super.update(id, data);

    return;
  }
}

export interface SampleStyle {
  id: number;
  hoge: string;
  fuga: string;
  piyo: string;
  created_at?: Date;
  updated_at?: Date;
  deleted_at?: Date;
}
