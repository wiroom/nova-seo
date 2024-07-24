import { Value } from '@/types/value';
import { Field } from '@/types/field';

export function useHydrate() {
  return (field: Field): Value => {
    return (
      (field.value as Value | null) ?? {
        title: '',
        description: '',
        permalink: '',
        image_url: '',
        focus_keyword: '',
        robots_noindex: false,
        robots_nofollow: false,
      }
    );
  };
}
